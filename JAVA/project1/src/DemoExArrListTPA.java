import java.util.ArrayList;

public class DemoExArrListTPA {
    public static void main(String[] args) {
        ArrayList<Persoana> list1=new ArrayList<>();
        ArrayList<Persoana> list2=new ArrayList<>();

        Persoana p1=new Persoana("Ana",25);
        Persoana p2=new Persoana("Mia",16);
        Persoana p3=new Persoana("Gheorghe",26);
        Persoana p4=new Persoana("Dominic",13);
        Persoana p5=new Persoana("Ion",38);
        list1.add(p1);
        list1.add(p2);
        list2.add(p3);
        list2.add(p4);
        list2.add(p5);

       list1.addAll(list2);
        for (int i=0;i<list1.size();i++){
            System.out.println(list1.get(i).getName()+"-"+list1.get(i).getAge()+"ani");
        }


       list1.removeIf(a->a.name.equals("Ana"));
        for (int i=0;i<list1.size();i++){
            System.out.println(list1.get(i).getName()+"-"+list1.get(i).getAge()+"ani");
        }


       list1.remove(list1.retainAll(list2));
        System.out.println("list1:");
       for (int i=0;i<list1.size();i++){
           System.out.println(list1.get(i).getName()+"-"+list1.get(i).getAge()+"ani");
       }
        System.out.println("list2:");
        for (int i=0;i<list2.size();i++){
            System.out.println(list2.get(i).getName()+"-"+list2.get(i).getAge()+"ani");
        }

    }

}
