require('./bootstrap');

import { Form } from "./modules/form";
import { Modal } from "./modules/modal";

function app() {
    Modal.init();
    Form.init();
}

document.onreadystatechange = function () {
    if (document.readyState == "complete") {
        app();
    }
}