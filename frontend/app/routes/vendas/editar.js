import Route from '@ember/routing/route';

export default Route.extend({
    model(params) {
        // Busca o registro a ser editado no store a partir do id informado na URL
        return this.store.find('venda', params.id);
    },

    renderTemplate() {
        // Renderiza um template diferente do padrão (que seria empresas/editar)
        this.render('vendas/form');
    }
});
