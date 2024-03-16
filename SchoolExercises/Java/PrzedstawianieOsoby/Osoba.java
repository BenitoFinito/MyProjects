public class Osoba {
    private String imie;
    private String nazwisko;
    private int wiek;
    public Osoba(){
        imie = "";
        nazwisko = "";
        wiek = 0;
    }
    public Osoba(String imie, String nazwisko){
            wiek = 0;
            this.imie = imie;
            this.nazwisko = nazwisko;
    }
    public Osoba(String imie, String nazwisko, int wiek ){
        this.imie = imie;
        this.nazwisko = nazwisko;
        this.wiek = wiek;
    }

    public void przedstawSie(){
        if(wiek != 0) {
            System.out.println("Hejka, tu: " + imie + ". Moje nazwisko: " + nazwisko + ". Mój wiek: " + wiek + ". ");
        }else if(imie == "" && nazwisko == "" && wiek == 0){
            System.out.println("Hejka, moje imie: nie istnieje. Moje nazwisko: nie istnieje. Nie istnieję :D");
        }else{
            System.out.println("Hejka, tu: " + imie + ". Moje nazwisko: " + nazwisko + ". Nie żyję :D");
        }
    }
}