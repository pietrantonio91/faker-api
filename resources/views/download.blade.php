<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faker Api - Fake data CSV, Excel, SQL, JSON</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    {{-- Highlight js --}}
    <link rel="stylesheet" href="assets/css/agate.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <a class="navbar-brand" href="/">
            @include('parts.logo')
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">FakerAPI</a>
                </li>
            </ul>
        </div>
    </nav>
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
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, fugit! Voluptatem
                            voluptate magni minus accusantium atque! Illum, earum maiores, animi cumque molestias
                            exercitationem pariatur, aliquid eveniet laborum velit dolore iusto. </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, ullam. Error nihil
                            perspiciatis eligendi ex dolor sint debitis voluptatum? Vero harum quae blanditiis
                            asperiores alias iste repellendus debitis necessitatibus quisquam.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="test" class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 mt-5">
                    <div class="my-3">
                        <h2 class="text-center mb-5">
                            Configurazione dei campi
                        </h2>
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
                                    <td><input class="form-control" type="text" v-model="field.name" :key="index"></td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            << field.type >>
                                            <button class="btn btn-gradient btn-field" v-on:click="modalFieldTypes(index)">Change</button>
                                            <input type="hidden" v-model="field.type" :key="index">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button v-on:click="removeField(index)" class="btn btn-outline-danger btn-field"
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
                                            << newField.type >>
                                            <button class="btn btn-gradient btn-field" v-on:click="modalFieldTypes(null)">Field Type</button>
                                            <input type="hidden" v-model="newField.type">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button v-on:click="addField()" class="btn btn-success"
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
                    <div class="my-3 text-center">
                        <button type="button" class="refresh-request btn btn-gradient"
                            onclick="getRequest($('#test_url').val(), 'test_response')"><svg class="i-lightning"
                                viewBox="0 0 32 32" width="24" height="24" fill="none" stroke="currentcolor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M18 13 L26 2 8 13 14 19 6 30 24 19 Z"></path>
                            </svg> Send Test Request</button>
                    </div>
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
                                <input type="text" v-model="searchTypesInput" class="form-control" placeholder="Type to search" v-on:keydown="searchTypes">
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="list-group">
                                    <a href="javascript:void(0)" data-dismiss="modal" v-on:click="addType(type.type)" style="border-radius:0" class="list-group-item list-group-item-action" v-for="(type, index) in filteredTypes">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1"><< type.type >></h5>
                                        </div>
                                        <p class="mb-1"><strong>Example:</strong> << type.example>></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    Created by Alessandro Pietrantonio - 2020
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="assets/js/highlight.pack.js"></script>
    <script>
        const BASE_URL = '{{\URL::to('/')}}';
    </script>
    <script src="assets/js/requests.js"></script>
    <script src="assets/js/vue.js"></script>
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
                quantity: 100,
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
                        this.error = 'Scegli un nome per il nuovo campo';
                    } else if (this.newField.type == '') {
                        this.error = 'Scegli un tipo per il nuovo campo';
                    } else {
                        this.fields.push(this.newField);
                        this.newField = {
                            name: '',
                            type: ''
                        };
                    }
                    setTimeout(() => {
                        self.error = false;
                    }, 2000);
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
                }
            }
        })
    </script>
</body>

</html>
