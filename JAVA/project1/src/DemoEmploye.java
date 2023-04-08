public class DemoEmploye {

    public int getNrAngajati() {
        return nrAngajati;
    }

    public void setNrAngajati(int nrAngajati) {
        this.nrAngajati = nrAngajati;
    }

    int nrAngajati;

    public String getNumeCompanie() {
        return NumeCompanie;
    }

    public void setNumeCompanie(String numeCompanie) {
        NumeCompanie = numeCompanie;
    }

    String NumeCompanie;

    public String getNumeProdus() {
        return NumeProdus;
    }

    public void setNumeProdus(String numeProdus) {
        NumeProdus = numeProdus;
    }

    String NumeProdus;

    public int getNrTelefon() {
        return nrTelefon;
    }

    public void setNrTelefon(int nrTelefon) {
        this.nrTelefon = nrTelefon;
    }

    int nrTelefon;

    public DemoEmploye(int nrAngajati){
        this.nrAngajati=nrAngajati;
        System.out.println("Constructor DemoEmploye");
    }

    public DemoEmploye(int nrAngajati,String NumeCompnie){
        this(nrAngajati);
        this.NumeCompanie=NumeCompnie;
    }

    public DemoEmploye(int nrAngajati,String NumeCompnie,String NumeProdus){
        this(nrAngajati,NumeCompnie);
        this.NumeProdus=NumeProdus;
    }

    public DemoEmploye(int nrAngajati,String NumeCompnie,String NumeProdus,int nrTelefon){
        this(nrAngajati,NumeCompnie,NumeProdus);
        this.nrTelefon=nrTelefon;
    }
}
