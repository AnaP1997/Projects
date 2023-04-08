public class PolarBear extends Animal {
    String colour="White";
    public PolarBear(){
        super();
        //super(name);
        System.out.println("Constructor from polarBeAR");
    }
    public void colour(){
        System.out.println("Polar bear colour is: "+colour);
        System.out.println("The best colour is "+super.colour);

    }
}
