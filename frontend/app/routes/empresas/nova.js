import Route from '@ember/routing/route';

export default Route.extend({
    model() {
        // Cria um novo registro local para ser editado no formulário
        return this.store.createRecord('empresa');
    },

    renderTemplate() {
        // Renderiza um template diferente do padrão (que seria empresas/nova)
        this.render('empresas/form');
    }
});
