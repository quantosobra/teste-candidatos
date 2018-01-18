import Controller from '@ember/controller';
import { inject as service } from '@ember/service';

export default Controller.extend({
    notifications: service('notifications'),

    dataCompra: function() {
        return this.get('model').get('dataCompra');
    }.property(),

    empresaList: function () {
        return this.store.findAll('empresa');
    }.property(),

    clienteList: function () {
        return this.store.findAll('cliente');
    }.property(),

    // empresa: function () {
    //     return this.get('model').get('empresa');
    // }.property(),

    // cliente: function () {
    //     return this.get('model').get('cliente');
    // }.property(),

    actions: {
        setEmpresaSelection: function (empresa) {
            this.set('empresa', empresa);
        },
        setClienteSelection: function (cliente) {
            this.set('cliente', cliente);
        },
        setDataCompraSelection: function (dataCompra) {
            this.set('dataCompra', dataCompra);
        },
        submit() {
            this.get('model').set('empresa', this.get('empresa'));
            this.get('model').set('cliente', this.get('cliente'));
            this.get('model').set('dataCompra', new Date(this.get('dataCompra')));
            this.get('model').save().then(() => {
                this.get('notifications').add('Venda foi editada', 'user');
                this.transitionToRoute('vendas');
            }).catch((e) => {
                this.setProperties({ serverErrors: e.errors.children })
            });
        }
    }
});
