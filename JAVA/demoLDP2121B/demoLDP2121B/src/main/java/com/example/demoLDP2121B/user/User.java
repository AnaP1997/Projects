package com.example.demoLDP2121B.user;

import lombok.Data;

@Data
public class User {
    public User() {
    }

    public User(int id,String name,String lastname,String dob,String email) {
        this.id = id;
        this.name=name;
        this.lastname=lastname;
        this.dob=dob;
        this.email=email;
    }

    private int id;
    private String name;
    private String lastname;
    private String dob;
    private String email;

}
