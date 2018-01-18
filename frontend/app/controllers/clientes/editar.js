import Controller from '@ember/controller';
import { inject as service } from '@ember/service';

export default Controller.extend({
    notifications: service('notifications'),

    actions: {
        submit() {
            this.get('model').save().then(() => {
                this.get('notifications').add(`Cliente "${this.get('model').get('nome')}" foi editado.`, 'user');
                this.transitionToRoute('clientes');
            }).catch((e) => {
                this.setProperties({ serverErrors: e.errors.children })
            });
        }
    }
});
