<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Custom;
use Faker\Factory as Faker;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $faker = Faker::create();
        $types = config('api.available_types');
        $new_types = [];
        foreach ($types as $name => $type) {
            $example = null;
            if ($type['method'] == 'special') {
                // metodi speciali che non esistono in faker di zaninotto
                switch ($name) {
                    case 'name':
                        $example = $faker->firstName().' '.$faker->lastName();
                        break;

                    case 'image':
                        $example = 'http://placeimg.com/640/480/any';
                        break;

                    case 'counter':
                        $example = $faker->randomDigitNotNull();
                        break;

                    default:
                        break;
                }
            } else {
                if (isset($type['args'])) {
                    $args = implode(',', $type['args']);
                    $example = $faker->{$type['method']}($args);
                } else {
                    $example = $faker->{$type['method']};
                }
            }

            $new_types[] = [
                'type' => $name,
                'example' => $example
            ];
        }

        usort($new_types, function($a, $b) {
            return strcmp($a['type'], $b['type']);
        });

        return view('download')
            ->with('types', $new_types);
    }

    public function download(Request $request)
    {
        $quantity = $request->quantity;
        $fileType = $request->fileType;

        $newRequest = new Request;
        $fields = [];
        foreach($request->fields as $field) {
            $fields[$field['name']] = $field['type'];
        }
        $newRequest->merge($fields);

        switch ($fileType) {
            case 'csv':
                return $this->toCsv($newRequest, $quantity);
                break;

            case 'tsv':
                return $this->toCsv($newRequest, $quantity, "\t");
                break;

            case 'xls':
                return $this->toXls($newRequest, $quantity);
                break;

            case 'json':
                return $this->toJson($newRequest, $quantity);
                break;

            case 'sql':
                $tableName = @$request->tableName ?: 'table_name';
                return $this->toSql($newRequest, $quantity, $tableName);
                break;

            default:
                # code...
                break;
        }

        return redirect('/fake-data-csv');
    }

    protected function toCsv($request, int $quantity, string $delimiter = ',')
    {
        $faker = Faker::create();
        $file = storage_path('tmp').'/fakerAPI_'.date('Y-m-d_H-i-s').'.csv';
        $fhandle = fopen($file, "w") or die('Unable to open file!');
        // header
        fputcsv($fhandle, array_keys($request->all()), $delimiter);
        for ($i=0; $i < $quantity; $i++) {
            $row = (new Custom($request, $faker, null, $i+1))->toArray($request);
            fputcsv($fhandle, $row, $delimiter);
        }
        fclose($fhandle);

        $this->downloadAndDeleteFile($file, 'text/csv');
    }

    protected function toJson($request, int $quantity)
    {
        $faker = Faker::create();
        $file = storage_path('tmp').'/fakerAPI_'.date('Y-m-d_H-i-s').'.json';
        $fhandle = fopen($file, "w") or die('Unable to open file!');
        $rows = [];
        for ($i=0; $i < $quantity; $i++) {
            $rows[] = (new Custom($request, $faker, null, $i+1))->toArray($request);
        }
        fwrite($fhandle, json_encode($rows));
        fclose($fhandle);

        $this->downloadAndDeleteFile($file, 'application/json');
    }

    protected function toSql($request, int $quantity, string $tableName = 'table_name')
    {
        $faker = Faker::create();
        $file = storage_path('tmp').'/fakerAPI_'.date('Y-m-d_H-i-s').'.sql';
        $fhandle = fopen($file, "w") or die('Unable to open file!');
        $sql = '';
        for ($i=0; $i < $quantity; $i++) {
            $row = (new Custom($request, $faker, null, $i+1))->toArray($request);
            $sql .= "INSERT INTO $tableName (".implode(', ', array_keys($row)).") VALUES (\"".implode('", "', array_values($row))."\");\n";
        }
        fwrite($fhandle, $sql);
        fclose($fhandle);

        $this->downloadAndDeleteFile($file, 'application/octet-stream');
    }

    protected function toXls($request, int $quantity)
    {
        $faker = Faker::create();
        $file = storage_path('tmp').'/fakerAPI_'.date('Y-m-d_H-i-s').'.xls';
        $fhandle = fopen($file, "w") or die('Unable to open file!');
        // header
        fputcsv($fhandle, array_keys($request->all()), "\t");
        for ($i=0; $i < $quantity; $i++) {
            $row = (new Custom($request, $faker, null, $i+1))->toArray($request);
            fputcsv($fhandle, $row, "\t");
        }
        fclose($fhandle);

        $this->downloadAndDeleteFile($file, 'application/vnd.ms-excel; charset=UTF-16LE');
    }

    protected function downloadAndDeleteFile(string $file, string $filetype)
    {
        ignore_user_abort(true);
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename='.basename($file));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        header("Content-Type: ".$filetype);
        readfile($file);
        // delete tmp file
        unlink($file);
    }
}
