<?php
    class SingupController extends Controller
    {
        public function actionIndex()
        {
            Response::render("menu");
            Response::render("register");
            Response::render("footer");
        }
    }