import java.util.ArrayList;
import java.util.HashSet;
import java.util.LinkedHashSet;
import java.util.List;

public class DemoHash {
    public static void main(String[] args){
        HashSet<String> nume=new HashSet<>();
        nume.add("Madeleine");
        nume.add("Ana");
        nume.add("Laura");
        nume.add("Grigore");
        nume.add("Mihaiela");


        ArrayList<String> list1=new ArrayList<>();
        ArrayList<String> list2=new ArrayList<>();
        list1.add("Madeleine");
        list1.add("Ana");
        list1.add("Laura");
        list1.add("Grigore");
        list2.add("Mihaiela");
        list2.add("Grigore");
        list2.add("Grigore");
        list2.add("Grigore");
        list2.add("Grigore");
        list1.addAll(list2);

      HashSet<String> list3=new HashSet<>(list1);
      ArrayList<String> list4=new ArrayList<>(list3);





        HashSet<String> l1=new HashSet<>();
        HashSet<String> l2=new HashSet<>();
        l1.add("Petru");
        l1.add("Ana");
        l2.add("Petru");
        l2.add("Mihaela");


        for(String a:l1){
            for(String b:l2){
                if(a.equals(b))System.out.println(a);
            }
        }

    }
}
