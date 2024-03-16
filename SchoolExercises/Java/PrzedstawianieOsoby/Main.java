import java.util.Scanner;
public class Main {

    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);
        String imie, nazwisko;
        int wiek;
        Osoba a = new Osoba();
        Osoba b = new Osoba("","");
        System.out.println("Podaj imie i nazwisko:");
        imie = input.next();
        nazwisko = input.next();
        input.nextLine();
        Osoba c = new Osoba(imie,nazwisko);
        System.out.println("Podaj imie i nazwisko oraz wiek:");
        imie = input.next();
        nazwisko = input.next();
        wiek = input.nextInt();
        input.nextLine();
        Osoba d = new Osoba(imie,nazwisko,wiek);
        a.przedstawSie();
        b.przedstawSie();
        c.przedstawSie();
        d.przedstawSie();
    }
}