public class Animal {
    int age;

    public Animal(String name) {
        this.name = name;
        System.out.println("THIS IS CONSTRUCTOR FROM ANIMAL CLASS WITH AN ARG");
    }

    public String getName() {
        return name;
    }

    String name;
    String colour="Red";

    public Animal() {
        System.out.println("THIS IS CONSTRUCTOR FROM ANIMAL");
    }
}
