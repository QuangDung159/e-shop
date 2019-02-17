import moment from "moment";

export default class Helper {
    formatDate(datetime) {
        if (datetime) {
            return moment(String(datetime)).format("YYYY-MM-DD");
        }
    }
}