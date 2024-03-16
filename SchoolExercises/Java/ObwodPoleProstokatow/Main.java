import java.util.Scanner;
 class Prostokat {
    private double a;
    private double b;
    public Prostokat(){
        a = 0;
        b = 0;
    }
    public Prostokat(double c, double d){
        a = c;
        b = d;
    }
    public double Pole(){
        return a * b;
    }
    public double Obwod(){
        return 2*a + 2*b;
    }
    public void setA(double a){
        this.a = a;
    }
    public void setB(double b){
        this.b = b;
    }
}

public class Main {
    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);
        Prostokat p1 = new Prostokat();
        System.out.println("Pole pierwszego obiektu: ");
        System.out.println(p1.Pole());
        System.out.println("Obwód pierwszego obiektu: ");
        System.out.println(p1.Obwod());

        System.out.println("Wpisz pierwszą liczbę: ");
        double liczba1 = input.nextDouble();
        System.out.println("Wpisz drugą liczbę: ");
        double liczba2 = input.nextDouble();

        Prostokat p2 = new Prostokat(liczba1,liczba2);
        System.out.println("Pole drugiego obiektu: ");
        System.out.println(p2.Pole());
        System.out.println("Obwód drugiego obiektu: ");
        System.out.println(p2.Obwod());

        p2.setA(10);
        p2.setB(20);
        System.out.println("Pole drugiego obiektu (zmienione parametry): ");
        System.out.println(p2.Pole());
        System.out.println("Obwód drugiego obiektu (zmienione parametry): ");
        System.out.println(p2.Obwod());
    }
}