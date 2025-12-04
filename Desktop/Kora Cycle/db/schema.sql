-- Schema for Kora Cycle articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL UNIQUE,
  `excerpt` TEXT DEFAULT NULL,
  `content` LONGTEXT,
  `published_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert example article (sugar & skin aging)
INSERT INTO `articles` (`title`, `slug`, `excerpt`, `content`) VALUES
('Why Sugar Accelerates Skin Aging', 'sugar-skin-aging', 'Eating sugar doesn''t just affect your energy — it changes your skin at the molecular level.', '<p>Eating sugar doesn''t just affect your energy — it changes your skin at the molecular level. This article explains how sugar damages collagen and elastin through glycation, what that means for appearance and resilience, and practical steps to reduce harm.</p><h2>What is Glycation?</h2><p>Glycation is a non-enzymatic chemical reaction where sugar molecules bond to proteins and lipids, forming advanced glycation end products (AGEs). In skin, AGEs stiffen collagen and elastin fibers, reducing elasticity and increasing fragility. Over time, this leads to visible signs of aging — fine lines, deeper wrinkles, and uneven texture.</p><h2>The Evidence (Simplified)</h2><ul><li><strong>Clinical studies</strong> show higher AGE levels in skin samples correlate with decreased elasticity.</li><li><strong>Biochemistry</strong> explains how AGEs cross-link collagen fibers, making them brittle and less able to recover from mechanical stress.</li><li><strong>Inflammation</strong> increases where AGEs accumulate, which can accelerate breakdown and pigment changes.</li></ul><h2>Practical Tips to Protect Your Skin</h2><ol><li><strong>Reduce added sugars:</strong> Cut down on sodas, sweets, and processed snacks. Focus on whole foods.</li><li><strong>Favor low-glycemic carbs:</strong> Whole grains, legumes, and fiber-rich vegetables cause smaller blood sugar spikes.</li><li><strong>Antioxidant-rich diet:</strong> Berries, leafy greens, nuts, and fatty fish help neutralize oxidative stress linked with AGEs.</li><li><strong>Topical &amp; clinical care:</strong> Use sunscreen daily and consider treatments that promote collagen remodeling (retinoids, professional therapies) when appropriate.</li></ol><h2>Takeaway</h2><p>Minimizing added sugar, protecting skin from UV, and supporting overall metabolic health are practical, evidence-aligned ways to keep skin resilient.</p>');

-- Clients table for storing cycle details
CREATE TABLE IF NOT EXISTS `clients` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `first_name` VARCHAR(100) NOT NULL,
  `last_name` VARCHAR(100) NOT NULL,
  `lmp` DATE NOT NULL,
  `average_cycle_length` TINYINT UNSIGNED NOT NULL CHECK (average_cycle_length BETWEEN 21 AND 45),
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert 10 sample clients (LMP in ISO date format YYYY-MM-DD)
INSERT INTO `clients` (`first_name`, `last_name`, `lmp`, `average_cycle_length`) VALUES
('Amina','Otieno','2025-11-01',28),
('Grace','Mwangi','2025-11-10',30),
('Fatima','Ali','2025-10-28',26),
('Lina','Kariuki','2025-11-05',29),
('Ruth','Njeri','2025-11-12',27),
('Sandra','Muthoni','2025-10-25',31),
('Joy','Wanjiru','2025-11-03',28),
('Esther','Kamau','2025-10-30',24),
('Hawa','Ahmed','2025-11-07',35),
('Betty','Achieng','2025-11-15',28);
