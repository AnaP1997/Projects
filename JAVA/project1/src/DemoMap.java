import java.util.*;

public class DemoMap {
    public static void main(String[] args) {


        ArrayList<Persoana>p=new ArrayList<>();
        ArrayList<Persoana>pp=new ArrayList<>();
        ArrayList<Persoana>ppp=new ArrayList<>();

        Persoana p1=new Persoana("Ana",10000);
        Persoana p2=new Persoana("Mihaela",20000);
        Persoana p3=new Persoana("Victor",8000);
        Persoana p4=new Persoana("Victor",8000);
        Persoana p5=new Persoana("Ion",12000);
        Persoana p6=new Persoana("Gheorghe",5000);

        p.add(p1);
        p.add(p2);
        pp.add(p5);
        pp.add(p4);
        ppp.add(p3);
        ppp.add(p6);

        int a=p.stream().max(Comparator.comparing(Persoana::getAge)).get().getAge();
        int b=pp.stream().max(Comparator.comparing(Persoana::getAge)).get().getAge();
        int c=ppp.stream().max(Comparator.comparing(Persoana::getAge)).get().getAge();


      HashMap<Integer,List<Persoana>> persoane=new HashMap<>();

        persoane.put(a,p);
        persoane.put(b,pp);
        persoane.put(c,ppp);



        for (Map.Entry<Integer,List<Persoana>>m:persoane.entrySet()){
            System.out.println("Lista:");
            for (Persoana nume:m.getValue()){
                System.out.println(nume.getName()+"-"+nume.getAge());
            }
            System.out.println("cel mai mare salariu in lista: "+m.getKey()+"");

            }



    }
}
