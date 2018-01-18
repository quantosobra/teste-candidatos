import Controller from '@ember/controller';
import { inject as service } from '@ember/service';

export default Controller.extend({
    notifications: service('notifications'),
    
    actions: {
        remove(model) {
            model.destroyRecord().then(() => {
                this.get('notifications').add(`Venda foi removida.`, 'user');
                this.transitionToRoute('vendas')
            });
        }
    }
});
