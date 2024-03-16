package operations;
public class Fraction {
    private int nominator;
    private int denominator;

    public Fraction(int nominator, int denominator){
        if(denominator == 0) {
            throw new IllegalArgumentException("The denominator cannot be zero.");
        }
        this.nominator = nominator;
        this.denominator = denominator;
    }

    public int getNominator() {
        return nominator;
    }
    public int getDenominator() {
        return denominator;
    }

    public Fraction addition(Fraction ob){
        int newNom = (this.nominator * ob.denominator) + (ob.nominator * this.denominator);
        int newDenom = (this.denominator * ob.denominator);

        return new Fraction(newNom,newDenom);
    }
}