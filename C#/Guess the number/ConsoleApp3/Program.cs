using System.Security.Cryptography.X509Certificates;

Random rnd = new Random();
int sold = 5;
bool x = false;
do
{
    Console.Clear();
    Console.WriteLine("   Guess the number");

    Console.WriteLine();
    Console.WriteLine($"Your balance:{sold}$");
    Console.WriteLine();
    Console.WriteLine("Enter the number(<=100) you think is hidden in the box: ");
    Console.ForegroundColor = ConsoleColor.Blue;
    Console.WriteLine("        -----");
    Console.WriteLine("       |     |");
    Console.WriteLine("        -----");

    Console.Write("->");
    int a = Convert.ToInt32(Console.ReadLine());
    int b = rnd.Next() % 100;
    if (a == b)
    {
        Console.ResetColor();
        Console.ForegroundColor = ConsoleColor.Green;

        sold += 5;
        Console.WriteLine("Congratulation you guessed it!");
        Console.WriteLine("       -----");
        Console.WriteLine($"      | {b} |");
        Console.WriteLine("       -----");
    }

    else
    {
        Console.ResetColor();
        Console.ForegroundColor = ConsoleColor.Red;

        sold = sold - 5;
        Console.WriteLine("Sorry wrong number!");
        Console.WriteLine("       -----");
        Console.WriteLine($"      | {b} |");
        Console.WriteLine("       -----");
    }
    Console.ResetColor();
    Console.WriteLine("Try again?");
    Console.WriteLine("1.Yes");
    Console.WriteLine("2.No");
    int w = Convert.ToInt32(Console.ReadLine());
    
    switch (w)
    {
        case 1:x = true;break;
        case 2:x = false;break;
    }
} while (x == true);
