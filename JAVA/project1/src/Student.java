import java.util.Objects;

public class Student {
    private int age;
    private String name;
    private static int grupa;

    public Student() {
    }

    public Student(int age, String name) {
        this.age = age;
        this.name = name;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public int getAge() {
        return age;
    }

    public void setAge(int age) {
        if (age>0) {
            this.age = age;
        } else {
            System.out.println("Introdu o virsta reala");
        }
    }

    public static int getGrupa() {
        return grupa;
    }

    public static void setGrupa(int grupa) {
        Student.grupa = grupa;
    }

    public void spuneCeva(){


    }


    public void cinta(){


    }
}
