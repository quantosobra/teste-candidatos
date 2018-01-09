import Controller from '@ember/controller';
import { inject as service } from '@ember/service';

export default Controller.extend({
    notifications: service('notifications'),

    actions: {
        submit() {
            this.get('model').save().then(() => {
                this.get('notifications').add('Cliente foi editado', 'user');
                this.transitionToRoute('clientes');
            });
        }
    }
});
