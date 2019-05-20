import moment from 'moment';

export default function (value) {
    if (value) {
        return moment(value).format('MMM Do');
    }
}