import java.util.ArrayList;
import java.util.HashSet;
import java.util.TreeSet;

public class HashSet1 {
    public static void main(String[] args){
        //Write a Java program to iterate through all elements in a hash list
        HashSet<String> fruits=new HashSet<>();
        fruits.add("Apple");
        fruits.add("Banana");
        fruits.add("Orange");
        fruits.add("Strawberry");

        //Write a Java program to get the number of elements in a hash set
        System.out.println("Nr. el.:"+fruits.size());

        //Write a Java program to empty a hash set
        fruits.removeAll(fruits);

        //Write a Java program to test a hash set is empty or not
        if(fruits.isEmpty())System.out.println("HashSetul este gol");
        else System.out.println("HashSetul nu este gol");

        //Write a Java program to clone a hash set to another hash set.
        HashSet<String> fruits1=new HashSet<>(fruits);

        //Write a Java program to convert a hash set to an array.
        String[] a=new String[fruits.size()];
        fruits.toArray(a);

        //Write a Java program to convert a hash set to a tree set.
        TreeSet<String> f=new TreeSet<>(fruits);

        //Write a Java program to convert a hash set to a List/ArrayList.
        ArrayList<String> fruit=new ArrayList<>(fruits1);

        // Write a Java program to compare two hash set.
        if(fruits1.contains(fruits))System.out.println("Hashsetul1 se contine in hashSetul2");

        //Write a Java program to compare two sets and retain elements which are same on both sets
        HashSet<String> ff=new HashSet<>();
        fruits.add("Apple");
        fruits.add("Strawberry");
        ff.retainAll(fruits);

        //Write a Java program to remove all of the elements from a hash set
        fruits1.removeAll(fruits1);
    }
}
