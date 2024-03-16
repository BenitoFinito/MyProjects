/**
 * @author benio
 */
public class Osoba {

    private String imie="";
    private String nazwisko="";

    public void setImieNazwisko(String imie, String nazwisko) {
        this.imie = imie;
        this.nazwisko = nazwisko;
    }
    public Osoba(){
        this.imie = "asdasdf";
        this.nazwisko = "sdfsdfsdfsdf";
    }
    public Osoba(String imie, String nazwisko){
        this.imie = imie;
        this.nazwisko = nazwisko;
    }

    @Override
    public String toString() {
        return imie+" "+nazwisko;
    }
    public String getImieNazwisko() {
        return imie+nazwisko;
    }

}
