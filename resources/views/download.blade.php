@extends('layout')

@section('navbar-nav')
@parent
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="/">Back to FakerAPI</a>
    </li>
</ul>
@endsection

@section('content')
<section id="what">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 mt-5">
                <h2 class="text-center">
                    Genera dati fake e scaricali
                </h2>
                <h4 class="text-center text-muted">
                    in formato CSV, Excel, JSON e SQL
                </h4>
                <div class="text-center my-3">
                    <img src="/assets/img/symbol.png" style="width: 100px;" alt="">
                </div>
                <div class="text-center my-3 py-3">
                    <p>
                        <strong>Faker API</strong> consente di generare e scaricare file con <strong>dati fake</strong> per utilizzarli come più si preferisce: generare un database, creare una request per una API che stiamo sviluppando...
                    </p>
                    <p>
                        In questa pagina è possibile scegliere il <strong>tipo di file</strong> che si vuole scaricare (CSV, JSON, SQL...), la <strong>quantità</strong> di dati da generare e configurare i vari campi del file.
                    </p>
                    <p>
                        Nella <strong>configurazione dei campi</strong> sarà possibile scegliere tra svariati tipi di campo (gli stessi che si possono trovare nella parte di <a href="/#docs">Documentazione delle API</a> sotto la voce Custom).
                    </p>
                </div>
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
                            Configurazione dei campi
                        </h4>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Field name</th>
                                    <th>Field type</th>
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
                                                    v-on:click="modalFieldTypes(index)">Change</button>
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
                                    <strong>Tipo di file:</strong>
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
                                    <strong>Nome tabella:</strong>
                                </div>
                                <div class="align-items-end col-md-6 d-flex">
                                    <input type="text" v-model="file.tableName" :name="'tableName'" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="align-items-end col-md-6 d-flex">
                                    <strong>Numero di righe:</strong>
                                </div>
                                <div class="align-items-end col-md-6 d-flex">
                                    <input type="number" min="1" max="1000" v-model="file.quantity" :name="'quantity'" class="form-control">
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
    </div>
    <div id="modalChooseType" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="background: #333;">
                <div class="modal-header text-center border-0">
                    <h3><span class="color-gradient text-center">Choose field type</span></h3>
                    <div class="row">
                        <div class="col">
                            <input type="text" v-model="searchTypesInput" class="form-control"
                                placeholder="Type to search" v-on:keydown="searchTypes">
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
