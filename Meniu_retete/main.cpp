#include <cmath>
#include <cstdlib>
#include <iostream>
#include <ctime>
#include <cstring>
#include <io.h>
#include <conio.h>
#include <windows.h>
using namespace std;
struct recipe{
    int tip;
    char *denumire=new char[50];
    char**ingrendiente=new char*[20];
    char**descrierea=new char*[30];

};

char ** add_line(char ** ingrediente, int nr_ingrediente, char * line)
{
    //Cream masivul temporar cu un rand mai mult
    char ** temp = new char * [nr_ingrediente + 1];
    for(int i = 0; i < nr_ingrediente; i++)
    {
        // Copiem tot continutul din masivul original
        temp[i] = new char [strlen(ingrediente[i] + 1)];
        strcpy(temp[i], ingrediente[i]);
        // Dupa ce am copiat stergem randul din masivul original
        delete [] ingrediente[i];
    }
    // Pe utlima pozitia din masivul nou creat inseram randul de text ce trebuie adaugat
    temp[nr_ingrediente] = new char [strlen(line + 1)];
    strcpy(temp[nr_ingrediente], line);

    // Stergem masivul original daca dimensiunea lui era mai mare ca 0
    if (nr_ingrediente > 0)
        delete [] ingrediente;

    // Returnam masivul nou cu randul de text inserat.
    return temp;
}
char ** redact_line(char ** ingrediente, int nr_ingrediente, int sterg)
{

    char ** temp = new char * [nr_ingrediente - 1];
    for(int i = 0; i < nr_ingrediente; i++)
    {

        if(i<sterg){temp[i] = new char [strlen(ingrediente[i] + 1)];
        strcpy(temp[i], ingrediente[i]);}
        else if(i>sterg){temp[i] = new char [strlen(ingrediente[i+1] + 1)];
        strcpy(temp[i], ingrediente[i+1]);}
        delete [] ingrediente[i];
    }


    // Stergem masivul original daca dimensiunea lui era mai mare ca 0
    if (nr_ingrediente > 0)
        delete [] ingrediente;

    // Returnam masivul nou cu randul de text inserat.
    return temp;
}

char ** add_descriere(char ** describe,int nr_pasi,char *text){
    char ** temp = new char * [nr_pasi + 1];
    for(int i = 0; i < nr_pasi; i++)
    { // Copiem tot continutul din masivul original
        temp[i] = new char [strlen(describe[i] + 1)];
        strcpy(temp[i], describe[i]);
        // Dupa ce am copiat stergem randul din masivul original
        delete [] describe[i];
    }
    // Pe utlima pozitia din masivul nou creat inseram randul de text ce trebuie adaugat
    temp[nr_pasi] = new char [strlen(text + 1)];
    strcpy(temp[nr_pasi], text);

    // Stergem masivul original daca dimensiunea lui era mai mare ca 0
    if (nr_pasi > 0)
        delete [] describe;

    // Returnam masivul nou cu randul de text inserat.
    return temp;
}
int options_nr=6;
char ** options = new char* [options_nr]{
    "1.Adauga o reteta noua.",
    "2.Sterge retete.",
    "3.Prezentare a retetelor(mic dejun/pranz/cina).",
    "4.Reda meniul pentru o zi.",
    "5.Reda meniul pentru o saptamana.",
    "6.Crearea listei de cumparaturi."
};
void print_menu(int pos)
{cout<<"\t\t<MENIU INTELIGENT>"<<endl;
cout<<endl;
    cout << "\tFoloseste sagetile pentru a alege optiunea dorita." << endl;
    cout << "\tEnter pentru a alege,Esc pentru a iesi di program." << endl;
    for(int i = 0; i < options_nr; i++)
    {
        if (i == pos - 1)
        {
            cout << "->";
        }

        cout << "\t\t" << options[i] << endl;
    }
}

void show_denumiri(recipe *r,int nr_retetelor){
for(int i=0;i<nr_retetelor;i++){
            cout<<"Reteta nr."<<i+1<<":"<<r[i].denumire<<endl;
                }}
void show_recipe(recipe *r,int nr_retetelor,int x,int y){
    cout<<r[nr_retetelor].denumire<<endl;
for(int i=0;i<x;i++){
    cout<<r[nr_retetelor].ingrendiente[i]<<endl;
}
for(int i=0;i<y;i++){
    cout<<r[nr_retetelor].descrierea[i]<<endl;
}


                }


   recipe *delete_rec(recipe *r,int nr_retetelor,int redact){
recipe *temp=new recipe[nr_retetelor-1];
for(int i=0;i<nr_retetelor-1;i++){
    if(i<redact)temp[i]=r[i];
    else if(i>redact)temp[i]=r[i+1];
}
delete []r;
return temp;
}



int main()
{FILE*f;
FILE*g;
FILE*h;
recipe a;
int x=0;
int y=0;
int nr_retetelor=0;
    recipe *r=new recipe[nr_retetelor];
    int pos = 1;
    int choice;

    char *nume=new char[20];
    do
    {
        system("cls");
        print_menu(pos);
        choice = getch();
        if (choice == 72 && pos > 1)
        {
            pos--;
        }else
        if(choice == 80 && pos < options_nr)
        {
            pos++;
        }else
        if(choice == 13)
        {


            if(pos==1){system("cls");

 char *denumirea=new char[50];
cout<<"Ce tip de reteta este?"<<endl;
cout<<"1.Mic dejun"<<endl;
cout<<"2.Pranz"<<endl;
cout<<"3.Cina"<<endl;
cin>>r[nr_retetelor].tip;
cin.ignore();

cout<<"Introduceti denumirea retetei: ";
           gets(denumirea);
           r[nr_retetelor].denumire=new char[strlen(denumirea)+1];
           strcpy(r[nr_retetelor].denumire,denumirea);


char*ingr=new char[50];
    cout<<"Adaugati ingrendientele si cantitatea corespunzatoare: "<<endl;
    cout<<"Finalizati cu textul 'fin' "<<endl;

    do{
        gets(ingr);
        if(strcmp(ingr,"fin")!=0)
        {

            // r[nr_retetelor].ingrendiente = new char[strlen(ingr)+1];
            r[nr_retetelor].ingrendiente = add_line(r[nr_retetelor].ingrendiente, x, ingr);
            // strcpy(r[nr_retetelor].ingrendiente[x],ingr);
            x++;
        }
    }while (strcmp(ingr,"fin")!=0);


char*desc=new char[255];
cout<<"Descrieti in pasi reteta: "<<endl;
cout<<"Finalizati cu textul 'Pofta buna!' "<<endl;

do{cout<<"Pasul "<<y+1<<": ";
gets(desc);
if(strcmp(desc,"Pofta buna!")!=0){

r[nr_retetelor].descrierea=add_descriere(r[nr_retetelor].descrierea,y,desc);
y++;}}while(strcmp(desc,"Pofta buna!")!=0);

system("cls");
cout<<"Verificati daca reteta este scrisa corect!"<<endl;
cout<<endl;
show_recipe(r,nr_retetelor,x,y);
cout<<"Totul este corect?"<<endl;
cout<<"1.DA"<<endl;
cout<<"2.NU"<<endl;
int al;cin>>al;
if(al==2){
                           cout<<"Redactati:"<<endl;
                           cout<<"1.Adaugati ingrendiente"<<endl;
                           cout<<"2.Stergeti ingrendiente"<<endl;
                           cout<<"3.Redactati descrierea."<<endl;
       int re;
       cin>>re;

            if(re==1){char*i=new char[50];
    cout<<"Adaugati ingrendientele si cantitatea corespunzatoare: "<<endl;
    cout<<"Finalizati cu textul 'fin' "<<endl;
    int q=0;
    do{
        gets(i);
        if(strcmp(i,"fin")!=0)
        {
            r[nr_retetelor].ingrendiente = add_line(r[nr_retetelor].ingrendiente, q, i);

            q++;
        }
    }while (strcmp(i,"fin")!=0);}

    else if(re==2){char*ii=new char[50];
    int sterg;
    cout<<"Nr ingrendientului care il stergeti:"<<endl;
    for(int i=0;i<x;i++){
    cout<<i+1<<r[nr_retetelor].ingrendiente[i]<<endl;
}
    cin>>sterg;
    r[nr_retetelor].ingrendiente = redact_line(r[nr_retetelor].ingrendiente, x,sterg);}


    else if(re==3){char*d=new char[255];
    char **de=new char*[20];
cout<<"Descrieti in pasi reteta: "<<endl;
cout<<"Finalizati cu textul 'Pofta buna!' "<<endl;
int u=0;
do{cout<<"Pasul "<<u+1<<": ";
gets(d);
if(strcmp(d,"Pofta buna!")!=0){

r[nr_retetelor].descrierea=add_descriere(de,u,d);
y++;}}while(strcmp(d,"Pofta buna!")!=0);}}
system("cls");cout<<"Reteta adaugata!";


    if(r[nr_retetelor].tip==1){f=fopen("dejunuri.txt","w");
    for(int i=0;i<x;i++){
    fprintf(f,"%s\n%s\n",r[nr_retetelor].denumire,
                         r[nr_retetelor].ingrendiente[i]);}
    for(int i=0;i<y;i++){
        fprintf(f,"%s\n",r[nr_retetelor].descrierea[i]);
    } fclose(f);}

    else if(r[nr_retetelor].tip==2){g=fopen("pranzuri.txt","w");
    for(int i=0;i<x;i++){
    fprintf(g,"%s\n%s\n",r[nr_retetelor].denumire,
                         r[nr_retetelor].ingrendiente[i]);}
    for(int i=0;i<y;i++){
        fprintf(g,"%s\n",r[nr_retetelor].descrierea[i]);
    } fclose(g);}
    if(r[nr_retetelor].tip==3){h=fopen("cina.txt","w");
    for(int i=0;i<x;i++){
    fprintf(h,"%s\n%s\n",r[nr_retetelor].denumire,
                         r[nr_retetelor].ingrendiente[i]);}
    for(int i=0;i<y;i++){
        fprintf(h,"%s\n",r[nr_retetelor].descrierea[i]);
    } fclose(h);}
     nr_retetelor++;x=0;y=0;
            getch();}



            else if(pos==2){system("cls");
            int redact;

            cout<<"Numarul retetei care o eliminati din lista:"<<endl;
            show_denumiri(r,nr_retetelor);
            cin>>redact;
           recipe *neww=new recipe[nr_retetelor-1];
       neww=delete_rec(r,nr_retetelor,redact);
       getch();}




    else if(pos==3){system("cls");
             cout<<"Ce tip de retete dorita sa vizualizati?"<<endl;
cout<<"1.Mic dejun"<<endl;
cout<<"2.Pranz"<<endl;
cout<<"3.Cina"<<endl;
int tip_r;
cin>>tip_r;
for(int i=0;i<nr_retetelor;i++){
    if(tip_r==1 &&r[i].tip==1){cout<<r[i].denumire<<endl;}
    if(tip_r==2 &&r[i].tip==2){cout<<r[i].denumire<<endl;}
    if(tip_r==3 &&r[i].tip==3){cout<<r[i].denumire<<endl;}
}

             getch();}

    else if(pos==4){system("cls");cout<<"Meniu pentru o zi"<<endl;
    /*r[0].denumire={"Clatite"};r[0].tip=1;
r[1].denumire={"Bors cu varza"};r[1].tip=2;
r[2].denumire={"Pilaf cu carne"};r[2].tip=3;
r[3].denumire={"Terci din crupe de mei"};r[3].tip=1;
r[4].denumire={"Zeama cu taitei de casa"};r[4].tip=2;
r[5].denumire={"Tocanita de legume inabusite"};r[5].tip=3;
r[6].denumire={"Terci de ovaz"};r[6].tip=1;
r[7].denumire={"Supa de mazare uscata"};r[7].tip=2;
r[8].denumire={"Fileu de peste inabusit cu legume"};r[8].tip=3;
r[9].denumire={"Terci de grau pe lapte"};r[9].tip=1;
r[10].denumire={"Zeama de peste cu orez"};r[10].tip=2;
r[11].denumire={"Taitei cu unt si cascaval"};r[11].tip=3;
r[12].denumire={"Terci din orez pe lapte"};r[12].tip=1;
r[13].denumire={"Zeama de pui"};r[13].tip=2;
r[14].denumire={"Terci de grau cu sos de piept de pui"};r[14].tip=3;
r[15].denumire={"Cornisor cu magiun"};r[15].tip=1;
r[16].denumire={"Supa de legume"};r[16].tip=2;
r[17].denumire={"Friptura de gaina cu legume"};r[17].tip=3;
r[18].denumire={"Terci de ovaz"};r[18].tip=1;
r[19].denumire={"Bors rosu de sfecla"};r[19].tip=2;
r[20].denumire={"Piureu de cartofi cu batuta"};r[20].tip=3;*/


for(int j=0;j<nr_retetelor;j++){

        if(r[j].tip==1)cout<<r[j].denumire<<endl;
        else if(r[j].tip==2)cout<<r[j].denumire<<endl;
        else if(r[j].tip==3)cout<<r[j].denumire<<endl;}


     getch();}
    else if(pos==5){system("cls");
       cout<<"Meniu pentru o saptamana"<<endl;
       /*r[0].denumire={"Clatite"};
r[1].denumire={"Bors cu varza"};
r[2].denumire={"Pilaf cu carne"};
r[3].denumire={"Terci din crupe de mei"};
r[4].denumire={"Zeama cu taitei de casa"};
r[5].denumire={"Tocanita de legume inabusite"};
r[6].denumire={"Terci de ovaz"};
r[7].denumire={"Supa de mazare uscata"};
r[8].denumire={"Fileu de peste inabusit cu legume"};
r[9].denumire={"Terci de grau pe lapte"};
r[10].denumire={"Zeama de peste cu orez"};
r[11].denumire={"Taitei cu unt si cascaval"};
r[12].denumire={"Terci din orez pe lapte"};
r[13].denumire={"Zeama de pui"};
r[14].denumire={"Terci de grau cu sos de piept de pui"};
r[15].denumire={"Cornisor cu magiun"};
r[16].denumire={"Supa de legume"};
r[17].denumire={"Friptura de gaina cu legume"};
r[18].denumire={"Terci de ovaz"};
r[19].denumire={"Bors rosu de sfecla"};
r[20].denumire={"Piureu de cartofi cu batuta"};
       for(int j=0;j<7;j++){

            if(j==0){cout<<"LUNI"<<endl;
                     cout<<r[0].denumire<<endl;
                     cout<<r[1].denumire<<endl;
                     cout<<r[2].denumire<<endl;}
            if(j==1){cout<<"MARTI"<<endl;
                     cout<<r[3].denumire<<endl;
                     cout<<r[4].denumire<<endl;
                     cout<<r[5].denumire<<endl;}
            if(j==2){cout<<"MIERCURI"<<endl;
                    cout<<r[6].denumire<<endl;
                    cout<<r[7].denumire<<endl;
                    cout<<r[8].denumire<<endl;}
            if(j==3){cout<<"JOI"<<endl;
                     cout<<r[9].denumire<<endl;
                     cout<<r[10].denumire<<endl;
                     cout<<r[11].denumire<<endl;}
            if(j==4){cout<<"VINERI"<<endl;
                    cout<<r[12].denumire<<endl;
                    cout<<r[13].denumire<<endl;
                    cout<<r[14].denumire<<endl;}
            if(j==5){cout<<"SAMBATA"<<endl;
                    cout<<r[15].denumire<<endl;
                    cout<<r[16].denumire<<endl;
                    cout<<r[17].denumire<<endl;}
            if(j==6){cout<<"DUMINICA"<<endl;
                    cout<<r[18].denumire<<endl;
                    cout<<r[19].denumire<<endl;
                    cout<<r[20].denumire<<endl;}}*/
   int k=7;
   char ** sapt=new char*[k]{  "Luni",
                               "Marti",
                               "Miercuri",
                               "Joi",
                               "Vineri",
                               "Sambata",
                               "Duminica"};

    for(int i=0;i<k;i++){
            for(int j=0;j<nr_retetelor;j++){
        cout<<sapt[i]<<endl;
        if(r[j].tip==1)cout<<r[j].denumire<<endl;
        else if(r[j].tip==2)cout<<r[j].denumire<<endl;
        else if(r[j].tip==3)cout<<r[j].denumire<<endl;
    }  }



       getch();}
   else if(pos==6){system("cls");
   FILE *in;
   int nr=20;
   char **lista_p=new char*[nr]{"1.Lapte",
                                  "2.Oua",
                                  "3.Unt",
                                 "4.Ulei",
                                "5.Faina",
                               "6.Branza",
                             "7.Smantana",
                                 "8.Sare",
                                "9.Piper",
                               "10.Zahar",
                               "11.Ceapa",
                             "12.Cartofi",
                              "13.Morcov",
                               "14.Ardei",
                               "15.Iaurt",
                               "16.Paine",
                               "17.Rosii",
                          "18.Castraveti",
                            "19.Maioneza",
                             "20.Usturoi"};

   in=fopen("lista_propusa.txt","w");
   for(int i=0;i<nr;i++){
    fprintf(in,"%s\n",lista_p[i]);
   }
    fclose(in);
    int da;int cate;
     int *lista=new int[40];
   do{system("cls");
        cout<<"Alegeti produsele din fisierul atasat"<<endl;

   int cc;
   in=fopen("lista_propusa.txt","r");
   while(!feof(in)){
       cc=getc(in);
       cout<<char(cc);
        }
   fclose(in);
cout<<"Cate produse alegeti din lista?"<<endl;
   cin>>cate;
   for(int i=0;i<cate;i++){
    cin>>lista[i];
   }


   cout<<endl;

   cout<<"Lista propusa poate fi redactata!"<<endl;
   cout<<"Adaugati produse?"<<endl;
   cout<<"1.DA"<<endl;
   cout<<"2.NU"<<endl;
   cin>>da;
   char *t=new char[30];
   if(da==1){cout<<"Adaugati ingrendientul:";gets(t);
        add_line(lista_p,nr,t);}}while(da==1);
   char **cantitatea=new char*[cate];
   char *ca=new char[30];
cin.ignore();
   for(int i=0;i<cate;i++){
    cout<<lista_p[lista[i]-1]<<" Cantitatea:";
    gets(ca);
    cantitatea[i]=new char[strlen(ca)+1];
    strcpy(cantitatea[i],ca);
    }
FILE *l_c;
l_c=fopen("lista_cumparaturi.txt","w");
for(int i=0;i<cate;i++){
fprintf(l_c,"%s %s\n",lista_p[lista[i]-1],
                      cantitatea[i]);}
fclose(l_c);
system("cls");
cout<<"Lista de cumparaturi a fost creata in fisier!";


       getch();}

        }
    }while (choice != 27);

    return 0;
}
