import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.Comparator;
import java.util.stream.Collectors;

public class ArrayListStream {
    public static void main(String[] args) {

        //Write a Java program to create a new array list, add some colors (string) and print out the collection.
        ArrayList<String> colors = new ArrayList<>();
        colors.add("Green");
        colors.add("Yellow");
        colors.add("White");
        colors.add("Black");
        colors.add("Blue");
        colors.stream().forEach(a -> System.out.println(a));

//Write a Java program to iterate through all elements in an array list.
        System.out.println("Itereaza elementele");

        for (int i = 0; i < colors.size(); i++) {
            System.out.println((i + 1) + "." + colors.get(i));
        }

//Write a Java program to insert an element into the array list at the first position.
        System.out.println("Add el. poz0");
        colors.add(0, "Red");

// Write a Java program to retrieve an element (at a specified color) from a given array list.
        System.out.println("Printeaza culoarea neagra");
        colors.stream().filter(a -> a.equals("Black")).forEach(a -> System.out.println(a));

// Write a Java program to update specific array element by given element.
        System.out.println("ADD element");
        colors.stream().map(a -> a + " Color").forEach(a -> System.out.println(a));

//Write a Java program to print without the third element from an array list.
        System.out.println("Fara el. 3");
        colors.stream().limit(2).forEach(a -> System.out.println(a));
        colors.stream().skip(Math.max(0, 3)).forEach(a -> System.out.println(a));

        //Write a Java program to search an element in a array list
        System.out.println("Cauta culoarea rosie");
        colors.stream().filter(a -> a.equals("Red")).forEach(a -> System.out.println(a));

        //Write a Java program to sort a given array list
        System.out.println("Sorteaza lista");
        colors.stream().sorted().forEach(a -> System.out.println(a));

        //Write a Java program to copy one array list into another.
        System.out.println("Copie lista in alta lista");
        List<String> color2 = new ArrayList<>();
        color2 = colors.stream().map(a -> a).collect(Collectors.toList());
        color2.stream().forEach(a -> System.out.println(a));

        //Write a Java program to shuffle elements in a array list
        System.out.println("Lista amestecata");
        colors.stream().sorted(Comparator.reverseOrder()).forEach(a -> System.out.println(a));

        //Write a Java program to reverse elements in a array list
        System.out.println("Lista inversata");
        Collections.reverse(color2);
        color2.stream().forEach(a -> System.out.println(a.toString()));

        //Write a Java program to extract a portion of a array list
        colors.stream().limit(4).forEach(a -> System.out.println(a));

        //Write a Java program to compare two array lists.
        System.out.println("se compara doua liste");
        ArrayList<String> color = new ArrayList<>();
        color.add("Pink");
        color.add("Purple");
        color.add("Red");
        if (colors.stream().anyMatch(a -> a.equals(color))) System.out.println("se contine in lista");
        else System.out.println("nu se contine in lista");

        // Write a Java program of swap two elements in an array list
        System.out.println("schimba cu locul doua elemente");
        Collections.swap(color2, 1, 3);
        color2.stream().forEach(a -> System.out.println(a));

        //Write a Java program to join two array lists
        System.out.println("copie doua liste in una");
        ArrayList<String> color3 = new ArrayList<>();
        color3.addAll(colors);
        color3.addAll(color2);
        color3.stream().forEach(a -> System.out.println(a));

        //Write a Java program to clone an array list to another array list.
        System.out.println("Cloneaza lista in alta lista");
        List<String> color4 = new ArrayList<>();
        color4 = colors.stream().map(a -> a).collect(Collectors.toList());
        color4.stream().forEach(a -> System.out.println(a));

        //Write a Java program to empty an array list.
        System.out.println("Sterge tot din lista");
        color4.removeAll(color4);

        //Write a Java program to test an array list is empty or not.
        System.out.println("verifica daca lista e goala");
        if (color4.isEmpty()) System.out.println("lista e goala");
        else System.out.println("lista nu e goala");

        //Write a Java program to trim the capacity of an array list the current list size.
        System.out.println("printeza lista la lungimea altei liste");
        color3.stream().limit(colors.size()).forEach(a -> System.out.println(a));

        //Write a Java program to increase the size of an array list.
        System.out.println("Mareste lungimea unei liste");
        color2.add("Violet");
        color2.stream().forEach(a -> System.out.println(a));

        //Write a Java program to replace the second element of a ArrayList with the specified element.
        System.out.println("Inlocuieste al doilea element cu alltul");
        colors.set(1, colors.get(3));
        colors.stream().forEach(a -> System.out.println(a));

        //Write a Java program to print all the distinct elements of a ArrayList
        System.out.println("Printeaza el. disticte");
        colors.stream().distinct().forEach(a -> System.out.println(a));


    }
}
