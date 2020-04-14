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
                                    <th>Field name</th>
                                    <th>Field type</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="fields.length > 0" v-for="(field, index) in fields">
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
                                <tr>
                                    <td><input class="form-control" type="text" v-model="newField.name"></td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            << newField.type>>
                                                <button type="button" class="btn btn-gradient btn-field"
                                                    v-on:click="modalFieldTypes(null)">Field Type</button>
                                                <input type="hidden" v-model="newField.type">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button  type="button" v-on:click="addField()" class="btn btn-success"
                                            style="border-radius: 100%; height: 32px; width: 32px; padding: 0; border: 0; line-height: 5px;">
                                            <svg id="i-plus" viewBox="0 0 32 32" width="16" height="16" fill="none"
                                                stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2">
                                                <path d="M16 2 L16 30 M2 16 L30 16"></path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
                                        <option value="xls" disabled>Excel (coming soon)</option>
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
    hljs.initHighlightingOnLoad();

        function scrollTo(id)
        {
            $('html,body').animate({
                scrollTop: $('#'+id).offset().top - 100
            }, 1000);
        }

        var vue = new Vue({
            el: '#test',
            delimiters: ["<<",">>"],
            data: {
                error: false,
                file: {
                    quantity: 100,
                    fileType: 'csv',
                    tableName: null
                },
                types: {!! json_encode($types) !!},
                filteredTypes: {!! json_encode($types) !!},
                fields: [
                    {
                        name: 'uuid',
                        type: 'uuid'
                    },
                    {
                        name: 'first_name',
                        type: 'firstName'
                    },
                    {
                        name: 'last_name',
                        type: 'lastName'
                    },
                    {
                        name: 'birthday',
                        type: 'date'
                    }
                ],
                newField: {
                    name: '',
                    type: ''
                },
                modalTypesOpen: false,
                selectedField: false,
                searchTypesInput: null
            },
            mounted() {
                this.filteredTypes = this.types;
            },
            methods: {
                removeField(index) {
                    this.fields.splice(index, 1);
                },
                addField() {
                    var self = this;
                    if (this.newField.name == '') {
                        this.setError('Scegli un nome per il nuovo campo');
                    } else if (this.newField.type == '') {
                        this.setError('Scegli un tipo per il nuovo campo');
                    } else {
                        this.fields.push(this.newField);
                        this.newField = {
                            name: '',
                            type: ''
                        };
                    }
                },
                modalFieldTypes(field = null) {
                    $('#modalChooseType').modal('show');
                    this.selectedField = field;
                },
                searchTypes(e) {
                    if (this.searchTypesInput !== null && this.searchTypesInput != '' && this.searchTypesInput !== undefined) {
                        let newTypesList = [];
                        for (let i = 0; i < this.types.length; i++) {
                            const element = this.types[i];
                            if(element.type.includes(this.searchTypesInput)) newTypesList.push(element);
                        }
                        this.filteredTypes = newTypesList;
                    } else {
                        this.filteredTypes = this.types;
                    }
                },
                addType(type) {
                    if (this.selectedField) {
                        this.fields[this.selectedField].type = type;
                    } else {
                        this.newField.type = type;
                    }
                },
                setError(text) {
                    var self = this;
                    this.error = text;
                    setTimeout(() => {
                        self.error = false;
                    }, 2000);
                },
                download() {
                    // controlli vari:
                    // fields deve essere maggiore di 0
                    if (this.fields.length < 1) {
                        return this.setError('Scegli almeno un campo.');
                    }
                    for (let n = 0; n < this.fields.length; n++) {
                        const element = this.fields[n];
                        // se un campo non ha type o nome do errore
                        if(element.name == '')
                            return this.setError('Tutti campi devono avere un nome.');
                        if(element.type == '')
                            return this.setError('Tutti campi devono avere un tipo assegnato.');
                    }
                    // quantità max 1000
                    if (this.file.quantity > 1000) {
                        return this.setError('Il file può contenere al massimo 1000 righe.');
                    }
                    // quantità min 1
                    if (this.file.quantity < 1) {
                        return this.setError('Il file non può contenere meno di 1 riga.');
                    }

                    this.$refs.downloadFileForm.submit();
                }
            }
        })
</script>
@endsection
