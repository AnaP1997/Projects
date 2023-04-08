public class DemoLambda {


    public static void main(String[] args) {
//print hello cu ajutorul obiectului
//        DemoPrint demoPrint = new DemoPrint();
//        demoPrint.print();
//        int a = 67;
//
//        ptint hello cu ajutorul lambda expr
//        DemoVoid a1= ()-> System.out.println("Say hello 1");
//        a1.ptintSomth();
//
//        DemoPrimavara variabilaLambda = () -> System.out.println("say hello");
//        variabilaLambda.printeazaPimavara();
//
//        DemoPrimavara demoPrimavara = () -> System.out.println("Este primavara");
//        demoPrimavara.printeazaPimavara();

        int a = 46;
        Persoana1 ani = () -> a;
        System.out.println("Persona are : " + ani.age());

        Persoana1 ani2 = () -> {
            System.out.println("Eu am ");
            return a + 18;
        };
        System.out.println(ani2.age());


//        DemoX varX = x -> x + 4;
//        System.out.println(varX.returnX(20));
//
//
//        DemoAdunare  adunarea =(x, y)-> x+y;
//        System.out.println("Demo adunarea "+adunarea.aduna(23, 46));

// printati cu ajutorul Lambda virsta voastra
// printati cu ajutorul Lambda virsta voastra + un numar transmi ca argument (int virst, int numarul)
//
//
    }
//    I
//    public  void printSomthElse(){ System.out.println("Say hello 2");}
//    ______  ____ ______________()-> System.out.println("Say hello 2");

//    II
//    public int printInt(){     return a; }
//    _____  ___ ________()->  a;


//    III
//    public int printArg(int a){ return a; }
//    ______ ___ ________ ___ a->  a;

//    VI
//    public int printArg(int a, int b){ return a; }
//    ______ ___ ________ (___ a,____ b)->  a+b;

//    V
//    public int printArg(int a, int b){
//    sout("Say hello");
//    int c= a+b;
//    return c;
//    }

//    (a,b)->{
//    sout("Say hello");
//    int c= a+b;
//    return c;
//    }


}
