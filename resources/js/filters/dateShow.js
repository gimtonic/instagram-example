import moment from 'moment';

export default function (value) {
    if (value) {
        return moment(value/1000).format("DD MMM YYYY hh:mm a");
    }
}