package com.example.demoLDP2121B.controller;

import com.example.demoLDP2121B.services.UserServices;
import com.example.demoLDP2121B.user.User;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RestController;

import java.util.ArrayList;
import java.util.List;
import java.util.Objects;

@RestController
public class UserController {
    @Autowired
    UserServices userServices;

    @GetMapping("/allUsers")
    public List showAllUsers(){
      return  userServices.setUser();
    }
    @GetMapping("/getById/{userId}")
    public User getById(@PathVariable int userId){
        List<User>listOfUsers=userServices.setUser();
        for (User user:listOfUsers){
            if (user.getId()==userId){
                return user;
            }

        }
       return null;
    }

    @GetMapping("/getByName/{userName}")
    public User getByName(@PathVariable String userName){
        List<User>listOfUsers1=userServices.setUser();
        for (User user:listOfUsers1){
            if (user.getName()==userName){
                return user;
            }
        }
        return null;
    }

    @GetMapping("/getByEmail/{userEmail}")
    public User getByEmail(@PathVariable String userEmail){
        List<User>listOfUsers=userServices.setUser();
        for (User user:listOfUsers){
            if (user.getEmail()==userEmail){
                return user;
            }

        }
        return null;
    }
}
