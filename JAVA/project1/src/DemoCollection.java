import java.util.*;

public class DemoCollection {

    public static void main(String[] args){
//        String[] ar={"A1","A2","A3"};
//
//        List<String> list =new ArrayList<>();
//        ArrayList<String> list2=new ArrayList<>();
//        list2.add("Mihaiela");
//        list2.add("Radu");
//        list2.add("Radu");
//        System.out.println("Primul element din lista:"+list2.get(0));
//        System.out.println("Al doilea element din lista:"+list2.get(1));
//        System.out.println("Al treilea element din lista:"+list2.get(2));
//
//        for(int i=0;i< list2.size();i++){
//            System.out.println("elemenul "+(i+1)+":"+list2.get(i));
//        }
//
//        for(String a:list2){
//            if(a.equals("Radu")){
//                break;
//            }
//            System.out.println(a);
//        }
//
//        Iterator iterator=list2.iterator();
//        while(iterator.hasNext()){
//            System.out.println(iterator.next());
//        }
//
//        ArrayList<String> aList=new ArrayList<>();
//        aList.add("Madeline");
//        aList.add("Laura");
//        aList.add("Grigore");
//        aList.add("Ana");
//        aList.add("Mihaiela");
//
//        for (String a:aList){
//            System.out.println("Grupa"+a);
//        }
//
//        aList.add(0,"M1");
//        for (String a:aList){
//            System.out.println(a);
//        }
        LinkedList<String> list=new LinkedList<>();
        list.add("Madeline");
        list.add("Laura");
        LinkedList<String> list1=new LinkedList<>();
        list1.add("Grigore");
        list1.add("Ana");
        list1.add("Mihaiela");

        list.addAll(list1);
        for (String a:list){
            System.out.println(a);
       }

        System.out.println("Lista in ordine alfabetica:");
        Collections.sort(list);


        for (String a:list){
            System.out.println(a);
        }

    }
}
