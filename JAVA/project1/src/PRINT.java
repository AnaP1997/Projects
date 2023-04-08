public class PRINT  {
    public static void main(String[] args) {

        int a = 25;
        Persoana1 ani = () -> a;
        System.out.println("Persona are : " + ani.age()+" ani");

       Add  add =(x, y)-> x+y;
       System.out.println(" Adunarea varstei cu 4 :"+add.adunarea(ani.age(), 4));

    }
}

