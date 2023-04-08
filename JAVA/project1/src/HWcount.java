import java.util.*;


public class HWcount {
    public static void main(String[] args) {
        String a="Hellllllo   Worrrrld";
        a=a.replaceAll("\\s","");
        ArrayList<Character> collection=new ArrayList<>();
        for(int i=0;i<a.length();i++){
            collection.add(a.charAt(i));
        }
        HashMap<Character,Integer> hashMap=new HashMap<>();

        System.out.println("In cuvantul "+a+":");
       for (int i=0;i<a.length();i++){
           hashMap.putIfAbsent(collection.get(i),
                   Collections.frequency(collection,collection.get(i)));
           }

        for (Map.Entry<Character,Integer>m:hashMap.entrySet()){
            System.out.println(m.getKey()+"-se contine de "+m.getValue()+" ori");
        }

    }
}
