import com.sun.org.apache.bcel.internal.generic.NEW;
import jdk.nashorn.internal.parser.JSONParser;

import java.security.spec.RSAOtherPrimeInfo;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.stream.Collectors;

public class DemoStream {
    public static void main(String[] args) {
//        List<String> valori = new ArrayList<String>(Arrays.asList("AB", null, "BC", null, "DE"));
//        List<String> valoriNenule;
//        valoriNenule = valori.stream().filter(a -> a != null).collect(Collectors.toList());
//        valoriNenule.stream().forEach(a -> System.out.println(a));

        ArrayList<Persoana> persoane = new ArrayList<>();
        Persoana p1 = new Persoana("Ana", 25);
        Persoana p2 = new Persoana("Mia", 6);
        Persoana p3 = new Persoana("Ion", 46);
        Persoana p4 = new Persoana("Vasile", 39);
        Persoana p5 = new Persoana("Dana", 16);
        persoane.add(p1);
        persoane.add(p2);
        persoane.add(p3);
        persoane.add(p4);
        persoane.add(p5);
        List<Persoana> persoaneMajore;
        persoaneMajore = persoane.stream().filter(a -> a.age > 18).collect(Collectors.toList());
        persoaneMajore.stream().forEach(a -> System.out.println(a.getName() + "-" + a.getAge() + "ani"));

        List<Integer> age=new ArrayList<>(Arrays.asList(1,3,4,2,6));
        age.stream().sorted().forEach(a-> System.out.println(a));
    }
}
