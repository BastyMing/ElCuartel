<?php
    class SingupController extends Controller
    {
        public function actionIndex()
        {
            Response::render("menu");
            Response::render("accessControl/register");
            Response::render("footer");
        }
    }