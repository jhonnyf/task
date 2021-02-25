require('./bootstrap');

import { Form } from "./modules/form";
import { Modal } from "./modules/modal";
import { Board } from "./modules/board";

function app() {
    Modal.init();
    Form.init();
    Board.init();
}

document.onreadystatechange = function () {
    if (document.readyState == "complete") {
        app();
    }
}