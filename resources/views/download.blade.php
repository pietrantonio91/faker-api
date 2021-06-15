@extends('layout')

@section('meta')
    <title>Faker Api Download - Download Fake data CSV, Excel, SQL, JSON</title>
    <meta name="description" content="Generate fake data and download to your preferred file format: CSV, Excel, SQL, JSON.">
    <meta name="keywords" content="faker,api,fake data,fake data api,faker api,json,csv,excel,sql">
@endsection

@section('navbar-nav')
@parent
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="/{{ app()->getLocale() }}">Back to FakerAPI</a>
    </li>
</ul>
@endsection

@section('content')
<section id="what">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 d-md-flex d-none justify-content-center py-4">
                <iframe src="https://rcm-eu.amazon-adsystem.com/e/cm?o=29&p=14&l=ur1&category=prime_video&banner=1X33YCKXFGN8ZKYAAWR2&f=ifr&linkID=ebef1f6011effbe6fbcf8e408acdde4e&t=pietrantonio-21&tracking_id=pietrantonio-21" width="160" height="600" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
            </div>
            {{-- Mobile --}}
            <div class="col-12 d-sm-flex d-none d-md-none justify-content-center pt-4">
                <iframe src="https://rcm-eu.amazon-adsystem.com/e/cm?o=29&p=26&l=ur1&category=prime_video&banner=145YC6XKJN2WZ21YRD82&f=ifr&linkID=adcd687366a8bff6c92cbe81ac368286&t=pietrantonio-21&tracking_id=pietrantonio-21" width="468" height="60" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
            </div>
            {{-- Mobile --}}
            <div class="col-12 d-flex d-sm-none justify-content-center pt-4">
                <iframe src="https://rcm-eu.amazon-adsystem.com/e/cm?o=29&p=288&l=ur1&category=prime_video&banner=0QM45M6W7A80HVECCAR2&f=ifr&linkID=5c2516a0293f4dd8c8d4ddc27fbb77ca&t=pietrantonio-21&tracking_id=pietrantonio-21" width="320" height="50" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
            </div>
            <div class="col-md-8 mt-5">
                {!! trans('download.main') !!}
            </div>
            <div class="col-md-2 d-md-flex d-none justify-content-center py-4">
                <iframe src="https://rcm-eu.amazon-adsystem.com/e/cm?o=29&p=14&l=ur1&category=prime_video&banner=1X33YCKXFGN8ZKYAAWR2&f=ifr&linkID=ebef1f6011effbe6fbcf8e408acdde4e&t=pietrantonio-21&tracking_id=pietrantonio-21" width="160" height="600" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
            </div>
            {{-- Mobile --}}
            <div class="col-12 d-sm-flex d-none d-md-none justify-content-center pt-4">
                <iframe src="https://rcm-eu.amazon-adsystem.com/e/cm?o=29&p=26&l=ur1&category=prime_video&banner=145YC6XKJN2WZ21YRD82&f=ifr&linkID=adcd687366a8bff6c92cbe81ac368286&t=pietrantonio-21&tracking_id=pietrantonio-21" width="468" height="60" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
            </div>
            {{-- Mobile --}}
            <div class="col-12 d-flex d-sm-none justify-content-center pt-4">
                <iframe src="https://rcm-eu.amazon-adsystem.com/e/cm?o=29&p=288&l=ur1&category=prime_video&banner=0QM45M6W7A80HVECCAR2&f=ifr&linkID=5c2516a0293f4dd8c8d4ddc27fbb77ca&t=pietrantonio-21&tracking_id=pietrantonio-21" width="320" height="50" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</section>
<section id="test" class="mb-5">
    <div class="container">
        <div class="row">
            <form ref="downloadFileForm" action="/download" class="w-100" method="POST">
                <div class="col-md-8 offset-md-2 mt-5">
                    <div class="my-3">
                        <h4 class="text-center mb-5 color-gradient">
                            {!! trans('download.configuration.title') !!}
                        </h4>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>{{ trans('download.configuration.field_name') }}</th>
                                    <th>{{ trans('download.configuration.field_type') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                v-for="(field, index) in fields"
                                :key="index"
                                draggable="true"
                                v-on:dragstart="dragStart(index, $event)"
                                v-on:dragover.prevent
                                v-on:drop="dragFinish(index, $event)"
                                v-if="fields.length > 0"
                                >
                                    <td class="text-center text-muted" style="cursor:pointer">
                                        <svg id="i-ellipsis-horizontal" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            <circle cx="7" cy="16" r="2" />
                                            <circle cx="16" cy="16" r="2" />
                                            <circle cx="25" cy="16" r="2" />
                                        </svg>
                                    </td>
                                    <td><input class="form-control" type="text" :name="'fields['+index+'][name]'" v-model="field.name" :key="index"></td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            << field.type>>
                                                <button  type="button" class="btn btn-gradient btn-field"
                                                    v-on:click="modalFieldTypes(index)">{{ trans('download.configuration.change') }}</button>
                                                <input type="hidden" v-model="field.type" :name="'fields['+index+'][type]'" :key="index">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button  type="button" v-on:click="removeField(index)" class="btn btn-outline-danger btn-field"
                                            style="border-radius: 100%; height: 32px; width: 32px; padding: 0; border: 0; line-height: 10px;">
                                            <svg id="i-close" viewBox="0 0 32 32" width="16" height="16" fill="none"
                                                stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2">
                                                <path d="M2 30 L30 2 M30 30 L2 2"></path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <button  type="button" v-on:click="addField()" class="btn btn-success"
                                style="border-radius: 100%; height: 32px; width: 32px; padding: 0; border: 0; line-height: 5px;">
                                <svg id="i-plus" viewBox="0 0 32 32" width="16" height="16" fill="none"
                                    stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2">
                                    <path d="M16 2 L16 30 M2 16 L30 16"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div v-if="error" class="my-3 text-center text-danger">
                        << error>>
                    </div>
                    <div class="my-3 mt-5">
                        <div class="form-group">
                            <div class="row">
                                <div class="align-items-end col-md-6 d-flex">
                                    <strong>{{ trans('download.configuration.file_type') }}:</strong>
                                </div>
                                <div class="align-items-end col-md-6 d-flex">
                                    <select name="" id="" v-model="file.fileType" :name="'fileType'" class="form-control">
                                        <option value="csv">CSV</option>
                                        <option value="tsv">TSV (with tab delimiter)</option>
                                        <option value="xls">Excel .xls</option>
                                        <option value="xlsx">Excel .xlsx</option>
                                        <option value="sql">SQL</option>
                                        <option value="json">JSON</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" v-if="file.fileType == 'sql'" >
                                <div class="align-items-end col-md-6 d-flex">
                                    <strong>{{ trans('download.configuration.table_name') }}:</strong>
                                </div>
                                <div class="align-items-end col-md-6 d-flex">
                                    <input type="text" v-model="file.tableName" :name="'tableName'" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="align-items-end col-md-6 d-flex">
                                    <strong>{{ trans('download.configuration.rows_number') }}:</strong>
                                </div>
                                <div class="align-items-end col-md-6 d-flex">
                                    <input type="number" min="1" max="1000" v-model="file.quantity" :name="'quantity'" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="align-items-end col-md-6 d-flex">
                                    <strong>{{ trans('download.configuration.locale') }}:</strong>
                                </div>
                                <div class="align-items-end col-md-6 d-flex">
                                    <select :name="'locale'" id="" v-model="file.locale" class="form-control">
                                    @foreach(config('api.available_locales') as $locale)
                                        <option value="{{ $locale }}">{{ $locale }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-3 mt-5 text-center">
                        <button type="button" class="refresh-request btn btn-gradient" v-on:click="download"><svg
                                class="i-import" viewBox="0 0 32 32" width="24" height="24" fill="none"
                                stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M28 22 L28 30 4 30 4 22 M16 4 L16 24 M8 16 L16 24 24 16"></path>
                            </svg> Download</button>
                        <button type="button" v-on:click="openApiPreview" class="refresh-request btn btn-outline-gradient"><svg class="i-lightning" viewBox="0 0 32 32" width="24" height="24" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M18 13 L26 2 8 13 14 19 6 30 24 19 Z"></path>
                        </svg> Test API</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row mt-4 d-none d-md-block">
            <div class="col d-flex justify-content-center">
                <iframe src="https://rcm-eu.amazon-adsystem.com/e/cm?o=29&p=48&l=ez&f=ifr&linkID=526f87cfaf64a177018ad91cb268ad7a&t=pietrantonio-21&tracking_id=pietrantonio-21" width="728" height="90" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
            </div>
        </div>
        <div class="row mt-4 d-none d-sm-block d-md-none">
            <div class="col d-flex justify-content-center">
                <iframe src="https://rcm-eu.amazon-adsystem.com/e/cm?o=29&p=13&l=ez&f=ifr&linkID=e09380f86d35a00eb6fdd71c1792d754&t=pietrantonio-21&tracking_id=pietrantonio-21" width="468" height="60" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
            </div>
        </div>
        <div class="row mt-4 d-block d-sm-none">
            <div class="col d-flex justify-content-center">
                <iframe src="https://rcm-eu.amazon-adsystem.com/e/cm?o=29&p=42&l=ez&f=ifr&linkID=a2c0d4f2bcbfa0b928f2ffb25993b877&t=pietrantonio-21&tracking_id=pietrantonio-21" width="234" height="60" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
            </div>
        </div>
    </div>
    <div id="modalChooseType" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="background: #333;">
                <div class="modal-header text-center border-0">
                    <h3><span class="color-gradient text-center">Choose field type</span></h3>
                    <div class="row">
                        <div class="col">
                            <input type="text" v-model="searchTypesInput" class="form-control"
                                placeholder="Type to search" v-on:keyup="searchTypes">
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="list-group">
                                <a href="javascript:void(0)" data-dismiss="modal" v-on:click="addType(type.type)"
                                    style="border-radius:0" class="list-group-item list-group-item-action"
                                    v-for="(type, index) in filteredTypes">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">
                                            << type.type>>
                                        </h5>
                                    </div>
                                    <p class="mb-1"><strong>Example:</strong>
                                        << type.example>>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footerscripts')
@parent

<script>
    const TYPES = {!! json_encode($types) !!};
    const API_URL = '{{\URL::to('/')}}/api/v1/custom?';
</script>
<script src="/assets/js/download-prepare.js"></script>
@endsection
