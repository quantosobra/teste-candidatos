import Service from '@ember/service';

export default Service.extend({
    messages: null,

    init() {
        this._super(...arguments);
        this.set('messages', []);
    },

    add(message, icon = 'info-circle') {
        let object = {message, icon};
        this.get('messages').pushObject(object);
    },

    read(message) {
        let object = this.get('messages').findBy('message', message);
        this.get('messages').removeObject(object);
    }
});
