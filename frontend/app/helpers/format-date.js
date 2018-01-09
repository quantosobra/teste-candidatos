import Ember from 'ember';
import moment from 'moment';

export function formatDate([date], { format = 'DD/MM/YYYY' } = {}) {
	return moment(date).format(format);
}

export default Ember.Helper.helper(formatDate);
