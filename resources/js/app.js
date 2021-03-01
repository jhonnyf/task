require('./bootstrap');

import { Form } from "./modules/form";
import { Modal } from "./modules/modal";
import { Board } from "./modules/board";
import { Dropdown } from "./modules/dropdown";
import { LinkAjax } from "./modules/link-ajax";
import { Card } from "./modules/card";


function app() {
    Modal.init();
    Form.init();
    Board.init();
    Dropdown.init();
    LinkAjax.init();
    Card.init();
}

document.onreadystatechange = function () {
    if (document.readyState == "complete") {
        app();
    }
}