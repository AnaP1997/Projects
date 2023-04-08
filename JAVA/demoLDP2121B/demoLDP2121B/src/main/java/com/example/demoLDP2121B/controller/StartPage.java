package com.example.demoLDP2121B.controller;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class StartPage {
    @GetMapping()
    public String startPage(){
        return "Hello world";
    }
    @GetMapping("/helloName")
    public String myNameIs(){
        return "Hello Ana";
    }
}
