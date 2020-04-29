hljs.initHighlightingOnLoad();

function scrollTo(id) {
    $('html,body').animate({
        scrollTop: $('#' + id).offset().top - 100
    }, 1000);
}

Array.prototype.move = function (from, to) {
    this.splice(to, 0, this.splice(from, 1)[0]);
};

var vue = new Vue({
    el: '#test',
    delimiters: ["<<", ">>"],
    data: {
        error: false,
        file: {
            quantity: 100,
            fileType: 'csv',
            tableName: null,
            locale: 'en_US'
        },
        types: TYPES,
        filteredTypes: TYPES,
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
        searchTypesInput: null,
        dragging: false
    },
    mounted() {
        this.filteredTypes = this.types;
    },
    methods: {
        dragStart(index, event) {
            this.dragging = index;
        },
        dragFinish(index, event) {
            this.fields.move(this.dragging, index);
            this.dragging = false;
        },
        removeField(index) {
            this.fields.splice(index, 1);
        },
        addField() {
            this.fields.push({
                name: '',
                type: ''
            });
        },
        modalFieldTypes(field = null) {
            $('#modalChooseType').modal('show');
            this.selectedField = field;
        },
        searchTypes() {
            if (this.searchTypesInput !== null && this.searchTypesInput != '' && this.searchTypesInput !== undefined) {
                let newTypesList = [];
                for (let i = 0; i < this.types.length; i++) {
                    const element = this.types[i];
                    const string = element.type.toLowerCase();
                    if (string.includes(this.searchTypesInput.toLowerCase())) newTypesList.push(element);
                }
                this.filteredTypes = newTypesList;
            } else {
                this.filteredTypes = this.types;
            }
        },
        addType(type) {
            if (this.selectedField !== null) {
                this.fields[this.selectedField].type = type;
            } else {
                this.newField.type = type;
            }
            this.searchTypesInput = null;
            this.searchTypes();
        },
        setError(text) {
            var self = this;
            this.error = text;
            setTimeout(() => {
                self.error = false;
            }, 2000);
        },
        checkFields() {
            if (this.fields.length < 1) {
                this.setError('Scegli almeno un campo.');
                return false;
            }
            for (let n = 0; n < this.fields.length; n++) {
                const element = this.fields[n];
                // se un campo non ha type o nome do errore
                if (element.name == '') {
                    this.setError('Tutti campi devono avere un nome.');
                    return false;
                }
                if (element.type == '') {
                    this.setError('Tutti campi devono avere un tipo assegnato.');
                    return false;
                }
            }
            // quantità max 1000
            if (this.file.quantity > 1000) {
                this.setError('Il file può contenere al massimo 1000 righe.');
                return false;
            }
            // quantità min 1
            if (this.file.quantity < 1) {
                this.setError('Il file non può contenere meno di 1 riga.');
                return false;
            }
            return true;
        },
        download() {
            if (this.checkFields()) {
                this.$refs.downloadFileForm.submit();
            }
        },
        openApiPreview() {
            if (this.checkFields()) {
                let url = API_URL+'_quantity='+this.file.quantity+'&_locale='+this.file.locale+'&';
                for (let i = 0; i < this.fields.length; i++) {
                    const element = this.fields[i];
                    url += element.name+'='+element.type;
                    if(i+1 < this.fields.length) url += '&';
                }
                window.open(url, '_blank');
            }
        }
    }
})
