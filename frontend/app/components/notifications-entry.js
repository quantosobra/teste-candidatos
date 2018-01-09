import Component from '@ember/component';
import { inject as service } from '@ember/service';

export default Component.extend({
    tagName: '',
    notifications: service('notifications'),

    actions: {
        read() {
            let message = this.get('entry').message;
            this.get('notifications').read(message);
        }
    }
});
