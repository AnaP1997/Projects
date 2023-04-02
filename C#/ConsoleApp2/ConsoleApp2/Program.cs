List<Student> students = new List<Student>();
for(int i = 0; i < 1; i++)
{
    string name, lastname, gen, school, prof;
    double nMate, nRom, nEng;
    int age, cl;
    Console.WriteLine("Nume:");
    name =Console.ReadLine();
    Console.WriteLine("Prenume:");
    lastname = Console.ReadLine();
    Console.WriteLine("Gen:");
    gen = Console.ReadLine();
    Console.WriteLine("Scoala:");
    school = Console.ReadLine();
    Console.WriteLine("Profesor:");
    prof = Console.ReadLine();
    Console.WriteLine("Nota mate:");
    nMate =Convert.ToDouble(Console.ReadLine());
    Console.WriteLine("Nota engleza:");
    nEng = Convert.ToDouble(Console.ReadLine());
    Console.WriteLine("Nota romana:");
    nRom = Convert.ToDouble(Console.ReadLine());
    Console.WriteLine("Varsta:");
    age =Convert.ToInt32(Console.ReadLine());
    Console.WriteLine("Clasa:");
    cl = Convert.ToInt32(Console.ReadLine());
    


    students.Add(new Student( name,  lastname,  cl,  gen,  school,  prof,  nMate,  nRom,  nEng,  age));


}
for (int i = 0; i < 1; i++)
{
    students[i].showStud();
    Console.WriteLine("Nota medie:"+students[i].NotaMed());
    Console.WriteLine("Anul nasterii:" + students[i].AnNastere());
    Console.WriteLine("Profesorul:"); students[i].Profesor();

    if (students[i].CinciAni() == true) { Console.WriteLine("Vei termina scoala i 5 ani"); }
    else { Console.WriteLine("Nu vei termina scoala in 5 ani"); }

    students[i].NumePrenume();
}



class Student
{
    private string name, lastname,gen,school,prof;
    private double nMate,nRom,nEng;
    private int age,cl;
    public Student(string name, string lastname, int cl, string gen,string school,string prof, double nMate,double nRom,double nEng,int age)
    {
        this.name = name;
        this.lastname = lastname;
        this.cl = cl;
        this.gen = gen;
        this.school = school;
        this.prof = prof;
        this.nMate = nMate;
        this.nRom = nRom;
        this.nEng = nEng;
        this.age = age;
    }
    public void showStud() {
        Console.WriteLine($"Nume:{name}Prenume:{lastname}Varsta:{age}Gen:{gen}");
        Console.WriteLine($"Scoala:{school}Profesor:{prof}Clasa:{cl}");
        Console.WriteLine($"Note mate:{nMate};romana:{nRom};engleza:{nEng}");
    }
    public double NotaMed() 
    {
        double nota=(nEng+nMate+nRom)/3;
        return nota;
   }
    public int AnNastere()
    {
        int an =2022-age;
        return an;
    }
    public void Profesor()
    {
        Console.WriteLine($"Profesor:{prof}");
    }
    public bool CinciAni()
    { bool s;
        if (cl+5>=12)s= true;
        else s= false;
        return s;
    }
    public void NumePrenume()
    {
        Console.WriteLine($"Nume:{name}Prenume:{lastname}");

    }
    
}