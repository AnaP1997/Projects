package com.example.demoLDP2121B.services;

import com.example.demoLDP2121B.user.User;
import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.List;


@Service
public class UserServices {
    public List setUser(){
        User user=new User(1,"Ana","Palitu","20.06.1997","anarosca66@gmail.com");
        User user2=new User(2,"Sergiu","Gribincea","10.01.200","sergiu6@gmail.com");
        User user3=new User(3,"Elena","Elena","01.10.1986","elena@gmail.com");
        User user4=new User(3,"Tatiana","Tatiana","01.10.1986","tat@gmail.com");

        List<User> listaAngajatilor=new ArrayList<>();
        listaAngajatilor.add(user);
        listaAngajatilor.add(user2);
        listaAngajatilor.add(user3);
        return listaAngajatilor;}
}
