public class Postac extends Game {
    private int damage, hp;
    Postac(int dmg, int hp){
        damage = dmg;
        this.hp = hp;
    }
    Postac(){
        damage = 30;
        hp = 500;
    }
    public double attack() {
        return damage * points + (damage * (points / 10));
    }
    public double block() {
        return points;
    }
    public double rest() {
        return 0;
    }
    @Override
    public void Round(){
            int action = input.nextInt();
            int a = 0;
            while(a == 1) {
                switch (action) {
                    case 1 -> {
                        attack();
                        System.out.println("Mamma mia!");
                    }
                    case 2 -> block();
                    case 3 -> rest();
                    default -> a = 1;
                }
            }
    }

}
