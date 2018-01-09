import Route from '@ember/routing/route';

export default Route.extend({
    model(params) {
        // Busca o registro a ser editado no store a partir do id informado na URL
        return this.store.find('cliente', params.id);
    },

    renderTemplate() {
        // Renderiza um template diferente do padrão (que seria clientes/editar)
        this.render('clientes/form');
    }
});
