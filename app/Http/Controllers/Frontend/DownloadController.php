<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Custom;
use Faker\Factory as Faker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
        $locale = @$request->locale;

        $newRequest = new Request;
        $fields = [];
        foreach($request->fields as $field) {
            $fields[$field['name']] = $field['type'];
        }
        $newRequest->merge($fields);

        switch ($fileType) {
            case 'csv':
                return $this->toCsv($newRequest, $quantity, $locale);
                break;

            case 'tsv':
                return $this->toCsv($newRequest, $quantity, $locale, "\t");
                break;

            case 'xls':
                return $this->toXls($newRequest, $quantity, $locale);
                break;

            case 'xlsx':
                return $this->toXlsx($newRequest, $quantity, $locale);
                break;

            case 'json':
                return $this->toJson($newRequest, $quantity, $locale);
                break;

            case 'sql':
                $tableName = @$request->tableName ?: 'table_name';
                return $this->toSql($newRequest, $quantity, $tableName);
                break;

            default:
                # code...
                break;
        }

        return new RedirectResponse('/fake-data-download');
    }

    protected function toCsv($request, int $quantity, string $locale = 'en_US', string $delimiter = ',')
    {
        $faker = Faker::create($locale);
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

    protected function toJson($request, int $quantity, string $locale = 'en_US')
    {
        $faker = Faker::create($locale);
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

    protected function toSql($request, int $quantity, string $locale = 'en_US', string $tableName = 'table_name')
    {
        $faker = Faker::create($locale);
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

    protected function toXls($request, int $quantity, string $locale = 'en_US')
    {
        $rows = $this->makeArray($request, $quantity, $locale);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray($rows, NULL, 'A1');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename=fakerAPI_'.date('Y-m-d_H-i-s').'.xls');
        header('Cache-Control: max-age=0');

        $writer = new Xls($spreadsheet);
        $writer->save('php://output');
    }

    protected function toXlsx($request, int $quantity, string $locale = 'en_US')
    {
        $rows = $this->makeArray($request, $quantity, $locale);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray($rows, NULL, 'A1');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=fakerAPI_'.date('Y-m-d_H-i-s').'.xlsx');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    protected function makeArray($request, $quantity, $locale)
    {
        $faker = Faker::create($locale);
        $rows = [];
        // header
        $rows[] = array_keys($request->all());
        for ($i=0; $i < $quantity; $i++) {
            $rows[] = (new Custom($request, $faker, null, $i+1))->toArray($request);
        }
        return $rows;
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
