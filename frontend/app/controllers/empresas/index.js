import Controller from '@ember/controller';

export default Controller.extend({
    actions: {
        remove(model) {
            model.destroyRecord().then(() => {
                this.transitionToRoute('empresas')
            });
        }
    }
});
