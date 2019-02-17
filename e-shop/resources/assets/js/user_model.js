export default class User {
    constructor(id, username, email, role_id, phone, dob, point, full_name) {
        this.id = id;
        this.username = username;
        this.email = email;
        this.role_id = role_id;
        this.phone = phone;
        this.dob = dob;
        this.point = point;
        this.full_name = full_name;
    }
}